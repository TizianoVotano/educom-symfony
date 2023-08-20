<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230820201815 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, logo VARCHAR(100) NOT NULL, location VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_4FBF094F9D86650F (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, picture VARCHAR(150) NOT NULL, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, date_of_birth DATE NOT NULL, tel_nr VARCHAR(15) NOT NULL, address VARCHAR(50) NOT NULL, postal_code VARCHAR(8) NOT NULL, city VARCHAR(50) NOT NULL, motivation LONGTEXT NOT NULL, cv VARCHAR(50) NOT NULL, UNIQUE INDEX UNIQ_8157AA0FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vacancy (id INT AUTO_INCREMENT NOT NULL, company_id INT DEFAULT NULL, startdate DATE NOT NULL, function VARCHAR(50) NOT NULL, description VARCHAR(255) NOT NULL, difficulty VARCHAR(6) NOT NULL, location VARCHAR(100) NOT NULL, INDEX IDX_A9346CBD38B53C32 (company_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F9D86650F FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE vacancy ADD CONSTRAINT FK_A9346CBD38B53C32 FOREIGN KEY (company_id) REFERENCES company (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F9D86650F');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0FA76ED395');
        $this->addSql('ALTER TABLE vacancy DROP FOREIGN KEY FK_A9346CBD38B53C32');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE vacancy');
    }
}
