-- STOP
---- Update : make used Stop, available

UPDATE stop as s
INNER JOIN join_line_stop as jls
ON s.id = jls.stop_id
SET s.available=true;
/*
UPDATE stop as s SET s.available = true WHERE s.id IN (SELECT DISTINCT jls.stop_id FROM join_line_stop AS jls)
*/


-- STOP GROUP
---- UPDATE order -> next_stop_id
/*
SELECT jls1.*, jls2.stop_id
FROM join_line_stop jls1
INNER JOIN join_line_stop jls2
ON jls1.line_id = jls2.line_id
AND jls1.order+1 =jls2.order
AND jls1.way=jls2.way;
*/
UPDATE join_line_stop as jls1
INNER JOIN join_line_stop jls2
ON jls1.line_id = jls2.line_id
AND jls1.order+1 =jls2.order
AND jls1.way=jls2.way
SET jls1.next_stop_id = jls2.stop_id;



