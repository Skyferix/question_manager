<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220327110002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `option` DROP FOREIGN KEY FK_5A8600B04FAF8F53');
        $this->addSql('DROP INDEX IDX_5A8600B04FAF8F53 ON `option`');
        $this->addSql('ALTER TABLE `option` CHANGE question_id_id question_id INT NOT NULL');
        $this->addSql('ALTER TABLE `option` ADD CONSTRAINT FK_5A8600B01E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_5A8600B01E27F6BF ON `option` (question_id)');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EE47E7704');
        $this->addSql('DROP INDEX UNIQ_B6F7494EE47E7704 ON question');
        $this->addSql('ALTER TABLE question CHANGE answer_id_id answer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EAA334807 FOREIGN KEY (answer_id) REFERENCES `option` (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B6F7494EAA334807 ON question (answer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `option` DROP FOREIGN KEY FK_5A8600B01E27F6BF');
        $this->addSql('DROP INDEX IDX_5A8600B01E27F6BF ON `option`');
        $this->addSql('ALTER TABLE `option` CHANGE question_id question_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE `option` ADD CONSTRAINT FK_5A8600B04FAF8F53 FOREIGN KEY (question_id_id) REFERENCES question (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_5A8600B04FAF8F53 ON `option` (question_id_id)');
        $this->addSql('ALTER TABLE question DROP FOREIGN KEY FK_B6F7494EAA334807');
        $this->addSql('DROP INDEX UNIQ_B6F7494EAA334807 ON question');
        $this->addSql('ALTER TABLE question CHANGE answer_id answer_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE question ADD CONSTRAINT FK_B6F7494EE47E7704 FOREIGN KEY (answer_id_id) REFERENCES `option` (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B6F7494EE47E7704 ON question (answer_id_id)');
    }
}
