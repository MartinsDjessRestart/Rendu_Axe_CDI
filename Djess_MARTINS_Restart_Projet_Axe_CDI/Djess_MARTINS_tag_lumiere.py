import network   #import des fonction lier au wifi
import urequests#import des fonction lier au requetes http
import utime#import des fonction lier au temps
import ujson#import des fonction lier aà la convertion en Json
from machine import Pin, PWM, ADC # importe dans le code la lib qui permet de gerer les Pins de sortie
import utime # importe dans le code la lib qui permet de gerer le temp

tab = [PWM(Pin(18, mode=Pin.OUT)),PWM(Pin(17, mode=Pin.OUT)),PWM(Pin(16, mode=Pin.OUT))]
    
def changeColorByRVB(r,g,b):
    tab[0].duty_u16(r*255)
    tab[1].duty_u16(g*255)
    tab[2].duty_u16(b*255)
    
colorhashtag = {
                "#TwitTos":(255, 69, 0),
                "#IIM": (255, 165, 0),
                "#Code": (0, 255, 255),
                "#3D": (0, 255, 55),
                "#CDEB": (242, 0, 255),
                "#CD": (255, 255, 0),
                "#GA": (38, 0, 255),
                "#GD": (255, 0, 0),
                "#GP": (149, 0, 255),
                "#Random": (136, 0, 255),
}


wlan = network.WLAN(network.STA_IF) # met la raspi en mode client wifi
wlan.active(True) # active le mode client wifi

ssid = 'Galaxy_Jess'
password = 'Star_0402'
wlan.connect(ssid, password) # connecte la raspi au réseau
url = "http://192.168.17.248/rendu_cd/getONE.php"

while not wlan.isconnected():
    print("pas co")
    utime.sleep(1)
    pass

while(True):
    try:
        print("GET")
        r = urequests.get(url) # lance une requete sur l'url
        tag = r.json()["hashtag"] # traite sa reponse en Json
        print(tag)
        print(colorhashtag[tag])
        color = (colorhashtag[tag])
        changeColorByRVB(color[0],color[1],color[2])
        r.close() # ferme la demande
        utime.sleep(1)  
    except Exception as e:
        print(e)