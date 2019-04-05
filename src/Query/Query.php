<?php

namespace djstarcom\BookingComSDK\Query;

use function count;
use djstarcom\BookingComSDK\Exceptions\BookingResponseException;
use djstarcom\BookingComSDK\Exceptions\ModelException;
use djstarcom\BookingComSDK\HttpClient\HttpClientInterface;
use djstarcom\BookingComSDK\Models\Model;
use djstarcom\BookingComSDK\Models\Result;
use function is_array;

/**
 * Class QueryAbstract
 * @package djstarcom\BookingComSDK\Query
 */
abstract class Query
{
    public const REQUEST_METHOD_POST = 'POST';
    public const REQUEST_METHOD_GET = 'GET';

    /**
     * @var string
     */
    protected static $uri;

    /**
     * @var string
     */
    protected $model;

    /**
     * @var string
     */
    protected $endpoint = 'https://{secure}distribution-xml.booking.com/2.4/json';

    /**
     * QueryAbstract constructor.
     * @throws ModelException
     */
    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * @return Model
     * @throws ModelException
     */
    public function makeModel(): Model
    {
        $class = $this->model();
        $model = new $class;

        if (!$model instanceof Model) {
            throw new ModelException(sprintf('Class %s must be an instance of %s', $this->model(), Model::class));
        }

        return $this->model = $model;
    }

    /**
     * @return string
     */
    abstract protected function model(): string;

    /**
     * Returns a list of the bookings that have been made through your account or with one of your affiliate IDs.
     *
     * @param HttpClientInterface $client
     * @return Result
     * @throws BookingResponseException
     */
    public function execute(HttpClientInterface $client): Result
    {
        $data = $this->prepareRequestData();

        $uri = $this->getUri() ?? null;
        if ($uri === null) {
            throw new BookingResponseException('URI is not set');
        }

        $response = $client->call($this->getRequestMethod(), $this->getUrl($uri), $data);

        if (isset($response->message)) {
            throw new BookingResponseException($response->message);
        }

        return $this->prepareResponse($response->result);
    }

    /**
     * Prepare data for request.
     *
     * @return array
     */
    protected function prepareRequestData(): array
    {
        $data = array_filter(array_intersect_key(get_object_vars($this), $this->getAttributeMap()));
        if (count($data)) {
            foreach ($data as $key => $value) {
                if (is_array($value)) {
                    $data[$key] = implode(',', $value);
                }
            }
        }

        return $data;
    }

    /**
     * @return array
     */
    abstract protected function getAttributeMap(): array;

    /**
     * @return string
     */
    public function getUri(): ?string
    {
        return static::$uri;
    }

    /**
     * @return string
     */
    protected function getRequestMethod(): string
    {
        return self::REQUEST_METHOD_GET;
    }

    /**
     * @param $url
     * @return string
     */
    protected function getUrl($url): string
    {
        return str_replace('{secure}', $this->isSecure() ? 'secure-' : '', $this->endpoint) . $url;
    }

    /**
     * @return bool
     */
    abstract protected function isSecure(): bool;

    /**
     * @param $data
     * @return Result
     */
    protected function prepareResponse($data): Result
    {
        $collections = new Result();

        foreach ($data as $item) {
            $class = $this->model();

            /** @var Model $model */
            $model = new $class;
            $model->setAttributes((array)$item);

            $collections->addItem($model, $model->getPrimaryKey());
        }

        return $collections;
    }

    /**
     * @param array $data
     */
    public function setAttributes(array $data): void
    {
        $prepareData = array_intersect_key($data, $this->getAttributeMap());

        foreach ($prepareData as $key => $value) {
            if (!property_exists($this, $key)) {
                continue;
            }

            $this->$key = $value;
        }
    }
}
