<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230822083535 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE vacancy (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, date_of_birth DATE NOT NULL, function VARCHAR(50) NOT NULL, description LONGTEXT NOT NULL, difficulty VARCHAR(6) NOT NULL, location VARCHAR(70) NOT NULL, INDEX IDX_A9346CBDA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vacancy ADD CONSTRAINT FK_A9346CBDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vacancy DROP FOREIGN KEY FK_A9346CBDA76ED395');
        $this->addSql('DROP TABLE vacancy');
    }
}
