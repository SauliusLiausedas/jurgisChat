<?php

namespace App;
/**
 * @Entity @Table(name="messages")
 */
class Message
{
    /** @Id @Column(type="integer") @GeneratedValue */
    protected $id;
    /** @Column(type="text") */
    protected $message;
    /** @Column(type="integer") */
    protected $chat_id;
    /** @Column(type="datetime") */
    protected $created_at;

    public function getId()
    {
        return $this->id;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getChatId()
    {
        return $this->chat_id;
    }

    public function setChatId($chat_id)
    {
        $this->chat_id = $chat_id;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt()
    {
        $date = new \DateTime("now");
        $date->format('Y-m-d');
        $this->created_at = $date;
    }
}
