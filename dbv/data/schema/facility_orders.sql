CREATE DEFINER=`root`@`localhost` PROCEDURE `facility_orders`(criteria VARCHAR (45), analysis VARCHAR(45))
BEGIN
CASE criteria 
WHEN 'county' THEN
SELECT 
				              
				    f.facility_name as 'Facility Name',
				    IFNULL(DATEDIFF(NOW(), MAX(fo.order_date)),0) as 'Days From Last Order'
				

				FROM
                    
				    facility_orders fo
         
                 RIGHT JOIN facilities f ON fo.facility_code = f.facility_code
                 JOIN user u ON u.facility = f.facility_code
                 JOIN counties c ON c.id = u.county_id
	
				WHERE
                         f.using_hcmp = 1
				        AND c.id = analysis
                        

				GROUP BY f.facility_name
                 ORDER BY f.facility_name DESC;


 WHEN 'district' THEN
   SELECT 
				f.facility_name as 'Facility Name',
			IFNULL(DATEDIFF(NOW(), MAX(fo.order_date)),0) as 'Days From Last Order'
  
				    

				FROM
				    
				    counties c,
				    facility_orders fo
        
                 
                 RIGHT JOIN facilities f ON fo.facility_code = f.facility_code
				   JOIN districts d ON d.id = f.district
                
			     
				
				WHERE
                         f.using_hcmp = 1
				        AND d.id= analysis
				 
                 GROUP BY f.facility_name
                 ORDER BY f.facility_name DESC;


 WHEN 'facility' THEN
   SELECT 
				              
				    f.facility_name as 'Facility Name',
				    IFNULL(DATEDIFF(NOW(), MAX(fo.order_date)),0) as 'Days From Last Order'

				FROM
				   counties c,
				    facility_orders fo
        
                 
                 RIGHT JOIN facilities f ON fo.facility_code = f.facility_code
				   JOIN districts d ON d.id = f.district
                
			     
				
				WHERE
                         f.using_hcmp = 1
				         AND f.facility_code = analysis
				GROUP BY f.facility_name
                 ORDER BY f.facility_name DESC;


END CASE;

END