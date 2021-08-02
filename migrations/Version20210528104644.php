<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210528104644 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE userprofile ADD userverificationstatus_id INT DEFAULT NULL, ADD country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE userprofile ADD CONSTRAINT FK_1D3656B1B7189085 FOREIGN KEY (userverificationstatus_id) REFERENCES userverificationstatus (id)');
        $this->addSql('ALTER TABLE userprofile ADD CONSTRAINT FK_1D3656B1F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_1D3656B1B7189085 ON userprofile (userverificationstatus_id)');
        $this->addSql('CREATE INDEX IDX_1D3656B1F92F3E70 ON userprofile (country_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE userprofile DROP FOREIGN KEY FK_1D3656B1B7189085');
        $this->addSql('ALTER TABLE userprofile DROP FOREIGN KEY FK_1D3656B1F92F3E70');
        $this->addSql('DROP INDEX IDX_1D3656B1B7189085 ON userprofile');
        $this->addSql('DROP INDEX IDX_1D3656B1F92F3E70 ON userprofile');
        $this->addSql('ALTER TABLE userprofile DROP userverificationstatus_id, DROP country_id');
    }
}
