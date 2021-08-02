<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210528104237 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) DEFAULT NULL, phoneCode VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE userverificationstatus DROP FOREIGN KEY FK_5B79251BB7189085');
        $this->addSql('DROP INDEX IDX_5B79251BB7189085 ON userverificationstatus');
        $this->addSql('ALTER TABLE userverificationstatus DROP userverificationstatus_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE country');
        $this->addSql('ALTER TABLE userverificationstatus ADD userverificationstatus_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE userverificationstatus ADD CONSTRAINT FK_5B79251BB7189085 FOREIGN KEY (userverificationstatus_id) REFERENCES userprofile (id)');
        $this->addSql('CREATE INDEX IDX_5B79251BB7189085 ON userverificationstatus (userverificationstatus_id)');
    }
}
