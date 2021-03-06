CREATE TABLE IF NOT EXISTS groups (
  groupName TEXT PRIMARY KEY NOT NULL,
  isDefault INTEGER NOT NULL DEFAULT 0,
  inheritance TEXT,
  permissions TEXT
);

INSERT OR IGNORE INTO groups (groupName, isDefault, inheritance, permissions) VALUES("Guest", 1, NULL, "-pocketmine.command.me,pocketmine.command.list,pperms.command.ppinfo");
INSERT OR IGNORE INTO groups (groupName, isDefault, inheritance, permissions) VALUES("Admin", 0, "Guest", "pocketmine.broadcast,pocketmine.command.gamemode,pocketmine.command.give,pocketmine.command.kick,pocketmine.command.teleport,pocketmine.command.time");
INSERT OR IGNORE INTO groups (groupName, isDefault, inheritance, permissions) VALUES("Owner", 0, "Guest,Admin", "pocketmine.command,pperms.command");

CREATE TABLE IF NOT EXISTS groups_mw (
  groupName TEXT PRIMARY KEY NOT NULL,
  worldName TEXT NOT NULL,
  permissions_mw TEXT
);

INSERT OR IGNORE INTO groups_mw (groupName, worldName, permissions_mw) VALUES("Guest", "world", "test.permission.guest.world");
INSERT OR IGNORE INTO groups_mw (groupName, worldName, permissions_mw) VALUES("Admin", "world", "test.permission.admin.world");
INSERT OR IGNORE INTO groups_mw (groupName, worldName, permissions_mw) VALUES("Owner", "world", "test.permission.owner.world");

CREATE TABLE IF NOT EXISTS players (
  userName TEXT PRIMARY KEY NOT NULL,
  userGroup TEXT NOT NULL,
  permissions TEXT
);

CREATE TABLE IF NOT EXISTS players_mw (
  userName TEXT PRIMARY KEY NOT NULL,
  worldName TEXT NOT NULL,
  userGroup TEXT NOT NULL,
  permissions_mw TEXT
);
