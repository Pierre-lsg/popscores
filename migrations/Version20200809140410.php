<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200809140410 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE championship (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, season_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, logo VARCHAR(255) NOT NULL, number_competition_max4_calculus INTEGER NOT NULL, is_internal BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_EBADDE6A4EC001D1 ON championship (season_id)');
        $this->addSql('CREATE TABLE championship_rank_club (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, championship_id INTEGER NOT NULL, club_id INTEGER NOT NULL, rank INTEGER NOT NULL, score INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_D93D873294DDBCE9 ON championship_rank_club (championship_id)');
        $this->addSql('CREATE INDEX IDX_D93D873261190A32 ON championship_rank_club (club_id)');
        $this->addSql('CREATE TABLE championship_rank_player (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, championship_id INTEGER NOT NULL, player_id INTEGER NOT NULL, rank INTEGER NOT NULL, score INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_33BEFAAE94DDBCE9 ON championship_rank_player (championship_id)');
        $this->addSql('CREATE INDEX IDX_33BEFAAE99E6F5DF ON championship_rank_player (player_id)');
        $this->addSql('CREATE TABLE club (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE competition (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, championship_id INTEGER NOT NULL, name VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, internal_championship_id INTEGER NOT NULL, played_at DATETIME NOT NULL, logo VARCHAR(255) DEFAULT NULL, map VARCHAR(255) DEFAULT NULL, rule_file VARCHAR(255) DEFAULT NULL, rule_text CLOB DEFAULT NULL, player_by_team INTEGER NOT NULL, team_by_flight INTEGER NOT NULL, for_championship BOOLEAN NOT NULL, published_at DATETIME NOT NULL)');
        $this->addSql('CREATE INDEX IDX_B50A2CB194DDBCE9 ON competition (championship_id)');
        $this->addSql('CREATE TABLE competition_hole (competition_id INTEGER NOT NULL, hole_id INTEGER NOT NULL, PRIMARY KEY(competition_id, hole_id))');
        $this->addSql('CREATE INDEX IDX_668EA3837B39D312 ON competition_hole (competition_id)');
        $this->addSql('CREATE INDEX IDX_668EA38315ADE12C ON competition_hole (hole_id)');
        $this->addSql('CREATE TABLE competition_user (competition_id INTEGER NOT NULL, user_id INTEGER NOT NULL, PRIMARY KEY(competition_id, user_id))');
        $this->addSql('CREATE INDEX IDX_83D0485B7B39D312 ON competition_user (competition_id)');
        $this->addSql('CREATE INDEX IDX_83D0485BA76ED395 ON competition_user (user_id)');
        $this->addSql('CREATE TABLE competition_rank_player (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, competition_id INTEGER NOT NULL, player_id INTEGER NOT NULL, rank INTEGER NOT NULL, total_hit INTEGER NOT NULL, delta_hit INTEGER NOT NULL, score INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_3E2B3EAD7B39D312 ON competition_rank_player (competition_id)');
        $this->addSql('CREATE INDEX IDX_3E2B3EAD99E6F5DF ON competition_rank_player (player_id)');
        $this->addSql('CREATE TABLE competition_rank_team (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, competition_id INTEGER NOT NULL, team_id INTEGER NOT NULL, rank INTEGER NOT NULL, total_hit INTEGER NOT NULL, delta_hit INTEGER NOT NULL, score INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_69A0FA827B39D312 ON competition_rank_team (competition_id)');
        $this->addSql('CREATE INDEX IDX_69A0FA82296CD8AE ON competition_rank_team (team_id)');
        $this->addSql('CREATE TABLE flight (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, competition_id INTEGER NOT NULL, internal_competition_id INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_C257E60E7B39D312 ON flight (competition_id)');
        $this->addSql('CREATE TABLE flight_user (flight_id INTEGER NOT NULL, user_id INTEGER NOT NULL, PRIMARY KEY(flight_id, user_id))');
        $this->addSql('CREATE INDEX IDX_CAD8B2E91F478C5 ON flight_user (flight_id)');
        $this->addSql('CREATE INDEX IDX_CAD8B2EA76ED395 ON flight_user (user_id)');
        $this->addSql('CREATE TABLE hole (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, rule_id INTEGER NOT NULL, position_id INTEGER DEFAULT NULL, referees_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, description CLOB DEFAULT NULL, par INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_68CD3D91744E0351 ON hole (rule_id)');
        $this->addSql('CREATE INDEX IDX_68CD3D91DD842E46 ON hole (position_id)');
        $this->addSql('CREATE INDEX IDX_68CD3D91DFE3779D ON hole (referees_id)');
        $this->addSql('CREATE TABLE organizer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL)');
        $this->addSql('CREATE TABLE player (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, team_id INTEGER DEFAULT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, nickname VARCHAR(255) DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, is4_championship BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_98197A65296CD8AE ON player (team_id)');
        $this->addSql('CREATE TABLE player_ranking_calculus (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, championship_id INTEGER NOT NULL, rank INTEGER NOT NULL, score INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_7DF3E98894DDBCE9 ON player_ranking_calculus (championship_id)');
        $this->addSql('CREATE TABLE position (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, gps_start VARCHAR(255) NOT NULL, gps_stop VARCHAR(255) NOT NULL, picture_start VARCHAR(255) DEFAULT NULL, picture_end VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE result (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, player_id INTEGER NOT NULL, hole_id INTEGER NOT NULL, competition_id INTEGER NOT NULL, score INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_136AC11399E6F5DF ON result (player_id)');
        $this->addSql('CREATE INDEX IDX_136AC11315ADE12C ON result (hole_id)');
        $this->addSql('CREATE INDEX IDX_136AC1137B39D312 ON result (competition_id)');
        $this->addSql('CREATE TABLE rule (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description CLOB NOT NULL)');
        $this->addSql('CREATE TABLE season (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description CLOB NOT NULL)');
        $this->addSql('CREATE TABLE team (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, club_id INTEGER DEFAULT NULL, competition_id INTEGER DEFAULT NULL, flight_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, is4_championship BOOLEAN NOT NULL)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F61190A32 ON team (club_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F7B39D312 ON team (competition_id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61F91F478C5 ON team (flight_id)');
        $this->addSql('CREATE TABLE team_ranking_calculus (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, championship_id INTEGER NOT NULL, rank INTEGER NOT NULL, score INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_2BBA693294DDBCE9 ON team_ranking_calculus (championship_id)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, club_id INTEGER DEFAULT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL, simplified_password INTEGER DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
        $this->addSql('CREATE INDEX IDX_8D93D64961190A32 ON user (club_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE championship');
        $this->addSql('DROP TABLE championship_rank_club');
        $this->addSql('DROP TABLE championship_rank_player');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE competition_hole');
        $this->addSql('DROP TABLE competition_user');
        $this->addSql('DROP TABLE competition_rank_player');
        $this->addSql('DROP TABLE competition_rank_team');
        $this->addSql('DROP TABLE flight');
        $this->addSql('DROP TABLE flight_user');
        $this->addSql('DROP TABLE hole');
        $this->addSql('DROP TABLE organizer');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE player_ranking_calculus');
        $this->addSql('DROP TABLE position');
        $this->addSql('DROP TABLE result');
        $this->addSql('DROP TABLE rule');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE team_ranking_calculus');
        $this->addSql('DROP TABLE user');
    }
}
