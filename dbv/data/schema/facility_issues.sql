CREATE DEFINER=`root`@`localhost` PROCEDURE `facility_issues`(criteria VARCHAR (45), analysis VARCHAR(45))
BEGIN

CASE criteria 
WHEN 'county' THEN
 SELECT 
				              
				    f.facility_name as 'Facility Name',
				    IFNULL(DATEDIFF(NOW(), MAX(fi.created_at)),0) as 'Days from last issue'
				

				FROM

				    facility_issues fi
         
                 RIGHT JOIN facilities f ON fi.facility_code = f.facility_code
                 JOIN user u ON u.facility = f.facility_code
                 JOIN counties c ON c.id = u.county_id
                  
				WHERE
                        
                        f.using_hcmp = 1
				        AND c.id = analysis
                       

				GROUP BY f.facility_name
                 ORDER BY fi.created_at DESC;
 WHEN 'district' THEN
   SELECT 
				              
				    f.facility_name as 'Facility Name',
				    DATEDIFF(NOW(), MAX(fi.`created_at`)) as 'Days from last issue'

				FROM
				    
				    counties c,
				    facility_issues fi
        
                 
                 RIGHT JOIN facilities f ON fi.facility_code = f.facility_code
                 JOIN districts d ON d.id = f.district
      
				WHERE
						 f.using_hcmp = 1
				        AND d.id= analysis
				GROUP BY f.facility_name
                 ORDER BY fi.created_at DESC;

WHEN 'facility' THEN

SELECT 
				              
				    f.facility_name as 'Facility Name',
				    IFNULL(DATEDIFF(NOW(), MAX(fi.created_at)),0) as 'Days from last issue'
				

				FROM
				    counties c,
				    facility_issues fi
        
                 
                 RIGHT JOIN facilities f ON fi.facility_code = f.facility_code
                 JOIN districts d ON d.id = f.district
				 
                
			     
				
				WHERE
                         f.using_hcmp = 1
				         AND f.facility_code = analysis
				GROUP BY f.facility_name
                 ORDER BY fi.created_at DESC;
END CASE;

END