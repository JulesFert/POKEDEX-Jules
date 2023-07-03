<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230703075512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pokemon CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE number number INT NOT NULL, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE pokemon_type MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX pokemon_number ON pokemon_type');
        $this->addSql('DROP INDEX `primary` ON pokemon_type');
        $this->addSql('ALTER TABLE pokemon_type ADD pokemon_id INT NOT NULL, DROP id, DROP pokemon_number, CHANGE type_id type_id INT NOT NULL');
        $this->addSql('ALTER TABLE pokemon_type ADD CONSTRAINT FK_B077296A2FE71C3E FOREIGN KEY (pokemon_id) REFERENCES pokemon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE pokemon_type ADD CONSTRAINT FK_B077296AC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_B077296A2FE71C3E ON pokemon_type (pokemon_id)');
        $this->addSql('ALTER TABLE pokemon_type ADD PRIMARY KEY (pokemon_id, type_id)');
        $this->addSql('DROP INDEX type_id ON pokemon_type');
        $this->addSql('CREATE INDEX IDX_B077296AC54C8C93 ON pokemon_type (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pokemon MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON pokemon');
        $this->addSql('ALTER TABLE pokemon CHANGE id id INT UNSIGNED NOT NULL, CHANGE number number INT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE pokemon_type DROP FOREIGN KEY FK_B077296A2FE71C3E');
        $this->addSql('ALTER TABLE pokemon_type DROP FOREIGN KEY FK_B077296AC54C8C93');
        $this->addSql('DROP INDEX IDX_B077296A2FE71C3E ON pokemon_type');
        $this->addSql('ALTER TABLE pokemon_type DROP FOREIGN KEY FK_B077296AC54C8C93');
        $this->addSql('ALTER TABLE pokemon_type ADD id INT AUTO_INCREMENT NOT NULL, ADD pokemon_number INT UNSIGNED NOT NULL, DROP pokemon_id, CHANGE type_id type_id INT UNSIGNED NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('CREATE INDEX pokemon_number ON pokemon_type (pokemon_number)');
        $this->addSql('DROP INDEX idx_b077296ac54c8c93 ON pokemon_type');
        $this->addSql('CREATE INDEX type_id ON pokemon_type (type_id)');
        $this->addSql('ALTER TABLE pokemon_type ADD CONSTRAINT FK_B077296AC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
    }
}
