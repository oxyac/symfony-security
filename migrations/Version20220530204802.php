<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220530204802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE village (id INT AUTO_INCREMENT NOT NULL, chef_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_4E6C7FAA150A48F1 (chef_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE village ADD CONSTRAINT FK_4E6C7FAA150A48F1 FOREIGN KEY (chef_id) REFERENCES gnome (id)');
        $this->addSql('ALTER TABLE gnome ADD village_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE gnome ADD CONSTRAINT FK_98C9D0505E0D5582 FOREIGN KEY (village_id) REFERENCES village (id)');
        $this->addSql('CREATE INDEX IDX_98C9D0505E0D5582 ON gnome (village_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gnome DROP FOREIGN KEY FK_98C9D0505E0D5582');
        $this->addSql('DROP TABLE village');
        $this->addSql('DROP INDEX IDX_98C9D0505E0D5582 ON gnome');
        $this->addSql('ALTER TABLE gnome DROP village_id');
    }
}
