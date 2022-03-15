<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220309161957 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE education (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, url_label VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, started_at DATE DEFAULT NULL, stoped_at DATE DEFAULT NULL, INDEX IDX_DB0A5ED2CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, url_label VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, started_at DATE DEFAULT NULL, stoped_at DATE DEFAULT NULL, INDEX IDX_590C103CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, job_title VARCHAR(255) NOT NULL, is_busy TINYINT(1) NOT NULL, picture VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, about LONGTEXT DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisation (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, url_label VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, started_at DATE DEFAULT NULL, stoped_at DATE DEFAULT NULL, INDEX IDX_EAA5610ECCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, url_label VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, started_at DATE DEFAULT NULL, stoped_at DATE DEFAULT NULL, INDEX IDX_5E3DE477CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE softskill (id INT AUTO_INCREMENT NOT NULL, profile_id INT DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, url_label VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, started_at DATE DEFAULT NULL, stoped_at DATE DEFAULT NULL, INDEX IDX_C6267CCBCCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE education ADD CONSTRAINT FK_DB0A5ED2CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C103CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE realisation ADD CONSTRAINT FK_EAA5610ECCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE477CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE softskill ADD CONSTRAINT FK_C6267CCBCCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE education DROP FOREIGN KEY FK_DB0A5ED2CCFA12B8');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C103CCFA12B8');
        $this->addSql('ALTER TABLE realisation DROP FOREIGN KEY FK_EAA5610ECCFA12B8');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE477CCFA12B8');
        $this->addSql('ALTER TABLE softskill DROP FOREIGN KEY FK_C6267CCBCCFA12B8');
        $this->addSql('DROP TABLE education');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE realisation');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE softskill');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
