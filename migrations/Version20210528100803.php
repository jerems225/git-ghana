<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210528100803 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) DEFAULT NULL, emailConfirmed TINYINT(1) DEFAULT NULL, emailConfirmationToken VARCHAR(64) DEFAULT NULL, invitationRewardCount NUMERIC(10, 0) DEFAULT NULL, resetPasswordToken VARCHAR(64) DEFAULT NULL, resetPasswordTokenCreatedAt DATETIME DEFAULT NULL, password VARCHAR(100) DEFAULT NULL, withdrawalLimit NUMERIC(15, 6) DEFAULT NULL, feeDiscountFactor NUMERIC(15, 6) DEFAULT NULL, referredBy INT DEFAULT NULL, isBot TINYINT(1) DEFAULT NULL, isExchange TINYINT(1) DEFAULT NULL, isHolder TINYINT(1) DEFAULT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME NOT NULL, INDEX user_email (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
    }
}
