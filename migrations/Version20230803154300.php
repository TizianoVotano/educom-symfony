<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230803154300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE poppodium (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(50) NOT NULL, adres VARCHAR(100) NOT NULL, postcode VARCHAR(8) NOT NULL, woonplaats VARCHAR(100) NOT NULL, telefoonnummer VARCHAR(12) NOT NULL, email VARCHAR(50) NOT NULL, website VARCHAR(100) NOT NULL, logo_url VARCHAR(100) NOT NULL, afbeelding_url VARCHAR(150) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE poppodium');
    }
}
