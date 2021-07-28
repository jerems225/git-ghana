<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210627173631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
        $this->addSql('ALTER TABLE userprofile DROP FOREIGN KEY FK_1D3656B167B3B43D');
        $this->addSql('DROP INDEX IDX_1D3656B167B3B43D ON userprofile');
        $this->addSql('ALTER TABLE userprofile DROP users_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON DEFAULT NULL');
        $this->addSql('ALTER TABLE userprofile ADD users_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE userprofile ADD CONSTRAINT FK_1D3656B167B3B43D FOREIGN KEY (users_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1D3656B167B3B43D ON userprofile (users_id)');
    }
}
