<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221015145924 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE people_role_in_movie ADD CONSTRAINT FK_C58E3968F93B6FC FOREIGN KEY (movie_id) REFERENCES movie (id)');
        $this->addSql('ALTER TABLE people_role_in_movie ADD CONSTRAINT FK_C58E3963147C936 FOREIGN KEY (people_id) REFERENCES people (id)');
        $this->addSql('CREATE INDEX IDX_C58E3968F93B6FC ON people_role_in_movie (movie_id)');
        $this->addSql('CREATE INDEX IDX_C58E3963147C936 ON people_role_in_movie (people_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE people_role_in_movie DROP FOREIGN KEY FK_C58E3968F93B6FC');
        $this->addSql('ALTER TABLE people_role_in_movie DROP FOREIGN KEY FK_C58E3963147C936');
        $this->addSql('DROP INDEX IDX_C58E3968F93B6FC ON people_role_in_movie');
        $this->addSql('DROP INDEX IDX_C58E3963147C936 ON people_role_in_movie');
    }
}
