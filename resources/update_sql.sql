/*
Update make used Stop available
 */

UPDATE stop as s SET s.available = true WHERE s.id IN (SELECT DISTINCT jls.stop_id FROM join_line_stop AS jls)
