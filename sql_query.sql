-- INSERT SAMPLE PROPERTIES INTO DB

INSERT INTO property_listings 
(address, price, size, beds, baths, image_url, description, posted_date, status) 
VALUES 
('1234 Maple Street, Anytown, ST 12345', 350000.00, 1500, 3, 2, 
'https://img.freepik.com/free-photo/luxury-pool-villa-spectacular-contemporary-design-digital-art-real-estate-home-house-property-ge_1258-150749.jpg?size=626&ext=jpg&ga=GA1.1.1957074624.1714807663&semt=sph', 
'Lovely three-bedroom home in a quiet neighborhood. Includes a newly renovated kitchen and spacious backyard.', 
'2024-05-01', 'active');

INSERT INTO property_listings 
(address, price, size, beds, baths, image_url, description, posted_date, status) 
VALUES 
('2500 Oak Lane, Rivertown, LM 67890', 275000.00, 1800, 4, 3, 
'https://img.freepik.com/free-photo/luxury-pool-villa-spectacular-contemporary-design-digital-art-real-estate-home-house-property-ge_1258-150765.jpg?size=626&ext=jpg&ga=GA1.1.1957074624.1714807663&semt=sph', 
'Beautiful four-bedroom home with panoramic river views, featuring a large deck and a master suite with a walk-in closet.', 
'2024-05-10', 'active');

INSERT INTO propertylisting 
(address, price, size, beds, baths, image_url, description, posted_date) 
VALUES 
('500 Elm Street, Downtown, DS 89012', 485000.00, 1200, 2, 2, 
'https://img.freepik.com/free-photo/design-house-modern-villa-with-open-plan-living-private-bedroom-wing-large-terrace-with-privacy_1258-169758.jpg?size=626&ext=jpg&ga=GA1.1.1957074624.1714807663&semt=sph', 
'Modern two-bedroom apartment with a spacious open plan living area and state-of-the-art kitchen. Located in the heart of downtown, close to shopping, nightlife, and public transport.', 
'2024-05-04');