<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230820205243 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE application (id INT AUTO_INCREMENT NOT NULL, profile_id INT NOT NULL, selected TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_A45BDDC1CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE application ADD CONSTRAINT FK_A45BDDC1CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F9D86650F');
        $this->addSql('DROP INDEX UNIQ_4FBF094F9D86650F ON company');
        $this->addSql('ALTER TABLE company CHANGE user_id user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4FBF094F9D86650F ON company (user_id_id)');
        $this->addSql('ALTER TABLE vacancy DROP FOREIGN KEY FK_A9346CBD38B53C32');
        $this->addSql('DROP INDEX IDX_A9346CBD38B53C32 ON vacancy');
        $this->addSql('ALTER TABLE vacancy CHANGE company_id company_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vacancy ADD CONSTRAINT FK_A9346CBD38B53C32 FOREIGN KEY (company_id_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_A9346CBD38B53C32 ON vacancy (company_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE application DROP FOREIGN KEY FK_A45BDDC1CCFA12B8');
        $this->addSql('DROP TABLE application');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094F9D86650F');
        $this->addSql('DROP INDEX UNIQ_4FBF094F9D86650F ON company');
        $this->addSql('ALTER TABLE company CHANGE user_id_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094F9D86650F FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4FBF094F9D86650F ON company (user_id)');
        $this->addSql('ALTER TABLE vacancy DROP FOREIGN KEY FK_A9346CBD38B53C32');
        $this->addSql('DROP INDEX IDX_A9346CBD38B53C32 ON vacancy');
        $this->addSql('ALTER TABLE vacancy CHANGE company_id_id company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vacancy ADD CONSTRAINT FK_A9346CBD38B53C32 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_A9346CBD38B53C32 ON vacancy (company_id)');
    }
}
