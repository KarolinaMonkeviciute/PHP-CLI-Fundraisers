![LICENSE](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)
![Gluten Status](https://img.shields.io/badge/Gluten-Free-green.svg)
![Eco Status](https://img.shields.io/badge/ECO-Friendly-green.svg)

# PHP CLI FUNDRAISERS APP

This project is developed for educational purposes only.

<br>

## 🌟 About

This project is for educational porpuses only.

## 🎯 Project features/goals

- PHP CLI application utilizing Object-Oriented Programming
- CRUD operations for charities
- Logging of donations
- Input validations
- CSV import functionality for charities
- No external frameworks or packages are used

## 🧰 How to Run the Application

1. Open the `fundraisers` folder in your terminal.
2. Run the application by entering `php index.php` in the terminal.
3. Use the following commands along with the options:

   - To add a new charity:
     ```
     php index.php --controller=Charity --method=create --name=YourCharityName --email=yourCharity@email.com
     ```
   - View list of charities:
     ```
     php index.php --controller=Charity --method=charitiesList
     ```
   - Update existing charity:
     ```
     php index.php --controller=Charity --method=update --id=YourCHarityId --name=NewCharityName --email=newCharity@email.com
     ```
   - Delete a charity:
     ```
     php index.php --controller=Charity --method=delete --id=YourCharityId
     ```
   - Add a donation to a charity:
     ```
     php index.php --controller=Donation --method=add --charityId=YourCharityId --name=YourName --amount=donationAmount -dateTime=DateAndTimeOfDonation
     ```
   - Add charities from a CSV file:
     ```
     php index.php --controller=Csv --method=upload --filepath=YourFilepath
     ```

## 🎅 Authors

Karolina: [Github](https://github.com/KarolinaMonkeviciute)

## ⚠️ License

Distributed under the MIT License.
