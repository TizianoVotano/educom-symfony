<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230805122509 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiest (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(50) NOT NULL, genre VARCHAR(50) NOT NULL, omschrijving VARCHAR(200) NOT NULL, afbeelding_url VARCHAR(100) NOT NULL, website VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE optreden (id INT AUTO_INCREMENT NOT NULL, poppodium_id INT NOT NULL, artiest_id INT NOT NULL, voorprogramma_id_id INT DEFAULT NULL, omschrijving VARCHAR(255) DEFAULT NULL, datum DATETIME NOT NULL, prijs VARCHAR(10) NOT NULL, ticket_url VARCHAR(255) NOT NULL, afbeelding_url VARCHAR(255) DEFAULT NULL, INDEX IDX_6286F65DA2EEBB18 (poppodium_id), INDEX IDX_6286F65DAED85528 (artiest_id), INDEX IDX_6286F65DACCD19A7 (voorprogramma_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE optreden ADD CONSTRAINT FK_6286F65DA2EEBB18 FOREIGN KEY (poppodium_id) REFERENCES poppodium (id)');
        $this->addSql('ALTER TABLE optreden ADD CONSTRAINT FK_6286F65DAED85528 FOREIGN KEY (artiest_id) REFERENCES artiest (id)');
        $this->addSql('ALTER TABLE optreden ADD CONSTRAINT FK_6286F65DACCD19A7 FOREIGN KEY (voorprogramma_id_id) REFERENCES artiest (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE optreden DROP FOREIGN KEY FK_6286F65DA2EEBB18');
        $this->addSql('ALTER TABLE optreden DROP FOREIGN KEY FK_6286F65DAED85528');
        $this->addSql('ALTER TABLE optreden DROP FOREIGN KEY FK_6286F65DACCD19A7');
        $this->addSql('DROP TABLE artiest');
        $this->addSql('DROP TABLE optreden');
    }
}
