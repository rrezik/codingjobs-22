/*
    JOINING

    Joining allow you to associate/link different tables in the same query.
    You are making the 'relation' between primary key / foreign key.

*/

SELECT title, name, date_of_birth
FROM authors a
INNER JOIN books b ON a.id = b.author_id