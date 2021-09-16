SELECT * FROM users
WHERE email='yuzhilu@usc.edu';

SELECT pokemons.id, pokemons.name, types1.type AS primary_type, types2.type AS secondary_type
FROM pokemons
JOIN types as types1
ON types1.id=pokemons.primary_id
JOIN types as types2
ON types2.id=pokemons.secondary_id
WHERE 1=1
ORDER BY pokemons.id;

SELECT username, userpass AS password FROM users
WHERE username='dmtskr';
