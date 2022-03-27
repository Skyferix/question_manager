<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220327110940 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE question_bank (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_bank_question (question_bank_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_1FF6998E1F142E5C (question_bank_id), INDEX IDX_1FF6998E1E27F6BF (question_id), PRIMARY KEY(question_bank_id, question_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE question_template (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE question_bank_question ADD CONSTRAINT FK_1FF6998E1F142E5C FOREIGN KEY (question_bank_id) REFERENCES question_bank (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE question_bank_question ADD CONSTRAINT FK_1FF6998E1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE question_bank_question DROP FOREIGN KEY FK_1FF6998E1F142E5C');
        $this->addSql('DROP TABLE question_bank');
        $this->addSql('DROP TABLE question_bank_question');
        $this->addSql('DROP TABLE question_template');
    }
}
