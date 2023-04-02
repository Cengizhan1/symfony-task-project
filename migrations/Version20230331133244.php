<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230331133244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task ADD developer_id_id INT DEFAULT NULL, ADD state INT NOT NULL');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB2590CC5E00 FOREIGN KEY (developer_id_id) REFERENCES developer (id)');
        $this->addSql('CREATE INDEX IDX_527EDB2590CC5E00 ON task (developer_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE task DROP FOREIGN KEY FK_527EDB2590CC5E00');
        $this->addSql('DROP INDEX IDX_527EDB2590CC5E00 ON task');
        $this->addSql('ALTER TABLE task DROP developer_id_id, DROP state');
    }
}
