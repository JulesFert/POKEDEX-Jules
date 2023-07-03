<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230703073423 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, color VARCHAR(6) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE types');
        $this->addSql('ALTER TABLE pokemon MODIFY id INT UNSIGNED NOT NULL');
        $this->addSql('DROP INDEX id ON pokemon');
        $this->addSql('DROP INDEX number_2 ON pokemon');
        $this->addSql('DROP INDEX `primary` ON pokemon');
        $this->addSql('ALTER TABLE pokemon CHANGE number number INT NOT NULL, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE pokemon ADD PRIMARY KEY (id)');
        $this->addSql('DROP INDEX pokemon_number ON pokemon_type');
        $this->addSql('DROP INDEX type_id ON pokemon_type');
        $this->addSql('ALTER TABLE pokemon_type CHANGE pokemon_number pokemon_number INT NOT NULL, CHANGE type_id type_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE types (id INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, color VARCHAR(6) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE pokemon MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `PRIMARY` ON pokemon');
        $this->addSql('ALTER TABLE pokemon CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE number number INT UNSIGNED NOT NULL');
        $this->addSql('CREATE INDEX id ON pokemon (id)');
        $this->addSql('CREATE UNIQUE INDEX number_2 ON pokemon (number)');
        $this->addSql('ALTER TABLE pokemon ADD PRIMARY KEY (number)');
        $this->addSql('ALTER TABLE pokemon_type CHANGE pokemon_number pokemon_number INT UNSIGNED NOT NULL, CHANGE type_id type_id INT UNSIGNED NOT NULL');
        $this->addSql('CREATE INDEX pokemon_number ON pokemon_type (pokemon_number)');
        $this->addSql('CREATE INDEX type_id ON pokemon_type (type_id)');
    }
}
