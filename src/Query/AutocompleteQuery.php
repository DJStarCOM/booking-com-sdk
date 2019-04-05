<?php

namespace DJStarCOM\BookingComSDK\Query;

use DJStarCOM\BookingComSDK\Models\Autocomplete;

class AutocompleteQuery extends Query
{
    public const EXTRAS_ID_FORECAST = 'forecast';
    public const EXTRAS_ID_TIMEZONES = 'timezones';
    public const EXTRAS_ID_THEMES = 'themes';
    public const EXTRAS_ID_ENDORSEMENTS = 'endorsements';

    /**
     * @var string
     */
    protected static $uri = '/autocomplete';

    /**
     * Search text.
     * It is part or full name of a hotel, another destination or a theme.
     * It must be at least 3 characters long.
     *
     * @var string
     */
    protected $text;

    /**
     * Language code in which to display the results.
     *
     * @var string like 'en'
     */
    protected $language;

    /**
     * Partner affiliate id that will be appended to the search page URLs.
     *
     * @var string like '000000'
     */
    protected $affiliate_id;

    /**
     * Specify here what extra items of the result should be included.
     * See the endpoint description for more detailed information about each extra.
     *
     * @var array
     */
    protected $extras;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return AutocompleteQuery
     */
    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return AutocompleteQuery
     */
    public function setLanguage(string $language): self
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getAffiliateId(): string
    {
        return $this->affiliate_id;
    }

    /**
     * @param string $affiliate_id
     * @return AutocompleteQuery
     */
    public function setAffiliateId(string $affiliate_id): self
    {
        $this->affiliate_id = $affiliate_id;
        return $this;
    }

    /**
     * @return null|array
     */
    public function getExtras(): ?array
    {
        return $this->extras;
    }

    /**
     * @param array $extras
     * @return AutocompleteQuery
     */
    public function setExtras(array $extras): self
    {
        $this->extras = $extras;

        return $this;
    }

    /**
     * @return self
     */
    public function withExtras(): self
    {
        $this->extras = [
            self::EXTRAS_ID_FORECAST,
            self::EXTRAS_ID_TIMEZONES,
            self::EXTRAS_ID_THEMES,
            self::EXTRAS_ID_ENDORSEMENTS,
        ];

        return $this;
    }

    /**
     * @return array
     */
    protected function getAttributeMap(): array
    {
        return [
            'text'         => 'string',
            'language'     => 'string',
            'affiliate_id' => 'string',
            'extras'       => 'array',
        ];
    }

    /**
     * @return bool
     */
    protected function isSecure(): bool
    {
        return false;
    }

    /**
     * @return string
     */
    protected function model(): string
    {
        return Autocomplete::class;
    }
}
