-- Set storage engine schema version number
UPDATE ezsite_data SET value='6.4.0' WHERE name='ezpublish-version';

--
-- EZP-25880: Make ezuser.login case in-sensitive across databases, using case in-sensitive index
--

ALTER TABLE ezuser DROP CONSTRAINT ezuser_login, ADD CONSTRAINT ezuser_login UNIQUE KEY ((lower(login)));
