<?php

namespace AntistressStore\CdekSDK2\Entity\Responses;

/**
 * Class WebhookListResponse
 * Информация о подписках на получение вебхуков.
 */
class WebhookListResponse extends Source
{
    /**
     * Тип события.
     *
     * @var string
     */
    protected $type;

    /**
     * Идентификатор подписки.
     *
     * @var string
     */
    protected $uuid;

    /**
     * URL, на который клиенту приходят вебхуки.
     *
     * @var string
     */
    protected $url;

    /**
     * Получить параметр - тип события.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Получить параметр - идентификатор подписки.
     *
     * @return string
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Получить параметр - URL, на который клиенту приходят вебхуки.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
