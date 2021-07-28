<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210528105541 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE currency (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) DEFAULT NULL, abbreviation VARCHAR(4) DEFAULT NULL, usdRatio NUMERIC(15, 6) DEFAULT \'1.000000\' NOT NULL, symbol VARCHAR(5) DEFAULT NULL, symbolNative VARCHAR(5) DEFAULT NULL, decimalPrecision INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE timezone (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) DEFAULT NULL, tvCategory VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE userprofile ADD timezone_id INT DEFAULT NULL, ADD basecurrency_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE userprofile ADD CONSTRAINT FK_1D3656B13FE997DE FOREIGN KEY (timezone_id) REFERENCES timezone (id)');
        $this->addSql('ALTER TABLE userprofile ADD CONSTRAINT FK_1D3656B1C8D5A202 FOREIGN KEY (basecurrency_id) REFERENCES currency (id)');
        $this->addSql('CREATE INDEX IDX_1D3656B13FE997DE ON userprofile (timezone_id)');
        $this->addSql('CREATE INDEX IDX_1D3656B1C8D5A202 ON userprofile (basecurrency_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE userprofile DROP FOREIGN KEY FK_1D3656B1C8D5A202');
        $this->addSql('ALTER TABLE userprofile DROP FOREIGN KEY FK_1D3656B13FE997DE');
        $this->addSql('DROP TABLE currency');
        $this->addSql('DROP TABLE timezone');
        $this->addSql('DROP INDEX IDX_1D3656B13FE997DE ON userprofile');
        $this->addSql('DROP INDEX IDX_1D3656B1C8D5A202 ON userprofile');
        $this->addSql('ALTER TABLE userprofile DROP timezone_id, DROP basecurrency_id');
    }
}
