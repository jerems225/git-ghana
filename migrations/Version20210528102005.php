<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210528102005 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE userprofile (id INT AUTO_INCREMENT NOT NULL, users_id INT DEFAULT NULL, firstName VARCHAR(100) DEFAULT NULL, lastName VARCHAR(100) DEFAULT NULL, passportPic VARCHAR(255) DEFAULT NULL, driverLicenseFrontPic VARCHAR(255) DEFAULT NULL, driverLicenseBackPic VARCHAR(255) DEFAULT NULL, identityCardFrontPic VARCHAR(255) DEFAULT NULL, identityCardBackPic VARCHAR(255) DEFAULT NULL, facePic VARCHAR(255) DEFAULT NULL, referralToken VARCHAR(32) NOT NULL, kycToken VARCHAR(6) NOT NULL, verificationStatusModified TINYINT(1) DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, phoneNumber VARCHAR(50) DEFAULT NULL, createdAt DATETIME NOT NULL, updatedAt DATETIME NOT NULL, language VARCHAR(255) DEFAULT NULL, securityquestion VARCHAR(255) DEFAULT NULL, INDEX IDX_1D3656B167B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE userprofile ADD CONSTRAINT FK_1D3656B167B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE userprofile');
    }
}
