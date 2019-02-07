# gekkoBacktest
Get your historicaldata in json in CLI

params folders contains stock toml config files

Example of range parameter in Param folder with ranged toml

buyat = [1.001, 1.5] // from 1.001 to 1.5 with 6 floating

sellat = [0.92,1] // 

stop_loss_pct = [0.7,0.99] //

sellat_up = [1.001,1.2] //


> $ php importjson.php > 1.json

To change the PAIR go to line 226 and run this to backtest

> $ php backtest.php asset currency deltadays candlesize

> $ php backtest.php BTC ETH 15 60

to update your dataset

> $ php singleimport.php



# Done

- Randomly select trading parameters of available strategy in Param folder

- Incrementaly show profit > of market

- saving parameters in json format in a csv file



# TODO

- Adding multiple instance management and allocation 
- starting live trader from best results
- interfacing all this in a cool HTML5 dashboard



https://www.binance.com/?ref=15038787

# Donations

BTC 19Uc3XMfutwRuqHkStNNg9obXXe632JWAV

LTC LXTrF8Xz6ni2pAEC5WSkA8vfe7Kj6Mhq26

ETH 0x0ae8362ca54e44d6d4837d160c1a3dd0e3a9fbad
