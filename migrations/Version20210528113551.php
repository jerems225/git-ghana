<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210528113551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE useraccountactivity (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, time VARCHAR(100) DEFAULT NULL, browser VARCHAR(100) DEFAULT NULL, ip VARCHAR(100) DEFAULT NULL, location VARCHAR(100) DEFAULT NULL, action VARCHAR(100) DEFAULT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME NOT NULL, INDEX IDX_A6EB7EB967B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE useraccountactivity ADD CONSTRAINT FK_A6EB7EB967B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE useraccountactivity');
    }
}
