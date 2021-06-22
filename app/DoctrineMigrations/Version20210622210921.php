<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20210622210921 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__genus AS SELECT id, name, sub_family, species_count, fun_fact FROM genus');
        $this->addSql('DROP TABLE genus');
        $this->addSql('CREATE TABLE genus (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, sub_family VARCHAR(255) NOT NULL COLLATE BINARY, species_count INTEGER NOT NULL, fun_fact VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO genus (id, name, sub_family, species_count, fun_fact) SELECT id, name, sub_family, species_count, fun_fact FROM __temp__genus');
        $this->addSql('DROP TABLE __temp__genus');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__genus AS SELECT id, name, sub_family, species_count, fun_fact FROM genus');
        $this->addSql('DROP TABLE genus');
        $this->addSql('CREATE TABLE genus (id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, sub_family VARCHAR(255) NOT NULL, species_count INTEGER NOT NULL, fun_fact VARCHAR(255) NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO genus (id, name, sub_family, species_count, fun_fact) SELECT id, name, sub_family, species_count, fun_fact FROM __temp__genus');
        $this->addSql('DROP TABLE __temp__genus');
    }
}
