<?php

use App\Message;
use Doctrine\ORM\Tools\Setup;

// require "bootstrap.php";

class Messages
{
    public function saveMessage(string $message): void
    {
        $newMessage = $message;
        $chatId = 1;

        $message = new Message();
        $message->setMessage($newMessage);
        $message->setChatId($chatId);
        $message->setCreatedAt();

        $paths = array("./src");
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/src"), $isDevMode);

        $conn = array(
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/db.sqlite',
        );

        // obtaining the entity manager
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $entityManager = \Doctrine\ORM\EntityManager::create($conn, $config);

        $entityManager->persist($message);
        $entityManager->flush();

    }
}