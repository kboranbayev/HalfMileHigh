# Changelog
- All notable changes to this project will be documented in this file.
- This project will be using the K&R notation.
- Changelog's will be listed newest to oldest from top to bottom:

Project contributors:
- Sergey
- Tim
- Karl
- Kuanysh
- Jonathan

## [Unreleased] - Nov 12, 8.02 pm
### Updated
- Updated fleet functions.

## [Unreleased] - Nov 12, 8.22 pm
### Added
- Added ability to edit data in database file from console.

## [Unreleased] - Nov 12, 6.02 pm
### Updated
- Updated function that pulls data from Wacky server, updated edit pages to display info.

## [Unreleased] - Nov 12, 3.32 pm
### Updated
- Flightsmdl.php - created interface between model and csv file for displaying fleets.

## [Unreleased] - Nov 12, 2.42 pm
### Updated
- Fleetmdl.php - created interface between model and csv file for displaying fleets.

## [Unreleased] - Nov 10, 4.42 pm
### Updated
- Fleet.php: now manages add/delete function
- Flights.php: now manages add/delete function
- Fleetmdl.php: added validation rules
- Flightsmdl.php: added validation rules

### Added
- fleetadmin.php: admin mode for main fleet view
- flightsadmin.php: admin mode for main flight view
- planeedit.php: add/edit page for plane
- flightedit.php: add/edit page for flight

## [Unreleased] - Nov 9, 7.15 pm
### Updated
- .gitignore: /tmp/* for storing session data
- autoload.php: parsedown library autoload
- config.php: point to /tmp/ for session data
- constants.php: defined guest and owner vars
- Fleet.php: guest/owner button generation
- Fleet.php: start point for add / edit functions
- Flights.php: guest/owner button generation
- Flights.php: start point for add / edit functions
- Roles.php: role button functionality
- fleet.php: 'modebutton' call to Fleet.php
- flights.php: 'modebutton' call to Flights.php
### Added
- Parsedown.php: parsedown library for sessions
- addfleet.php: add to fleet button
- addflight.php: add flight button


## [Unreleased] - Nov 9, 5.46 pm
### Updated

- Modified Planesmdl so that is parses from fleet.csv and 
creates Plane objects. The Planemdl still uses the hardcoded 
array for now, but it will be simple to switch over


## [Unreleased] - Nov 9, 4.23 pm
### Updated
- Updated flights data to match business logic.

## [Unreleased] - Oct 8, 2.36 pm
### Updated
- Renamed flights model to resolve bug.

## [Unreleased] - Oct 8, 1.12 pm
### Updated
- Improved homepage with information about origin and destination of flights and number of planes.

## [Unreleased] - Oct 5, 8.12 pm
### Updated
- Added info/fleet and info/flights controllers that display JSON data returned from models

## [Unreleased] - Oct 5, 7.56 pm
### Updated
- Minor table styling on main page

## [Unreleased] - Oct 5, 7.55 pm
### Updated
- Updated fleet and flights models to better comply with Jim's sweet sweet standards

## [Unreleased] - Oct 5, 7.38 pm
### Updated
- Fixed plane image path in template.php so it renders in /fleet/$id

## [Unreleased] - Oct 5, 7.35 pm
### Updated
- Minor table styles, footer

## [Unreleased] - Oct 5, 7.18 pm
### Updated
- Updated dashboard to include information on flights leaving on certain days.

## [Unreleased] - Oct 5, 7.16 pm
### Updated
- added more data to fleet model and modified fleet controller and plane view to show that extra data

## [Unreleased] - Oct 5, 7.00 pm
### Updated
- Added subcontroller to fleet controller that displays info for a single plane when accessing /fleet/$id

## [Unreleased] - Oct 5, 6.58 pm
### Updated
- Footer style
- Table view

## [Unreleased] - Oct 5, 6.04 pm
### Added
- Updated site's style.
- Added bootstrap.
- Updated nav menu.

## [Unreleased] - Oct 5, 6.03 pm
### Added
- Fleet view
- Fleetlight integration with model


## [Unreleased] - Oct 5, 5.38 pm
### Added
- Flight view
- Flight integration with model

## [Unreleased] - Oct 5, 5.01 pm
### Added
- Fleet Model
- Flights Model

## [Unreleased] - Oct 5, 4.34 pm
### Added
- Changelog (additions newest first).
