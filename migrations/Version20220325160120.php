<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220325160120 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, question_id_id INT NOT NULL, text VARCHAR(4000) NOT NULL, INDEX IDX_5A8600B04FAF8F53 (question_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `option` ADD CONSTRAINT FK_5A8600B04FAF8F53 FOREIGN KEY (question_id_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE question ADD answer_id_id INT DEFAULT NULL, ADD text VARCHAR(4000) NOT NULL, ADD score INT NOT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EE47E7704 FOREIGN KEY (answer_id_id) REFERENCES `option` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B6F7494EE47E7704 ON question (answer_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EE47E7704');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP INDEX UNIQ_B6F7494EE47E7704 ON question');
        $this->addSql('ALTER TABLE question DROP answer_id_id, DROP text, DROP score');
    }
}
