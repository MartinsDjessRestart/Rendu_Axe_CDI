import network
import urequests
import utime
from machine import Pin

pin_button = Pin(14, mode=Pin.IN, pull=Pin.PULL_UP)

wlan = network.WLAN(network.STA_IF)  # Met la raspi en mode client wifi
wlan.active(True)  # Active le mode client wifi

ssid = 'Galaxy_Jess'
password = 'Star_0402'
wlan.connect(ssid, password)
url = "http://192.168.17.248/rendu_cd/getTWO.php"

while not wlan.isconnected():
    print("Pas connecté")
    utime.sleep(1)


def create_post():
    try:
        print('Post en cours...')
        # Insertion des données dans la base de données
        data = {
            'titre': 'Test bouton',
            'contenu': 'cool 2',
            'hashtag': '#CDI',
            'auteur': 'starcraf1t',
        }
        r = urequests.post(url, json=data)
        r.close()
        print("Post créé avec succès!")
    except Exception as e:
        print("Erreur lors de la création du post :", e)


def button_pressed(p):
    print("Bouton pressé")
    create_post()


# Attacher une fonction de rappel au bouton pour détecter les pressions
pin_button.irq(trigger=Pin.IRQ_FALLING, handler=button_pressed)

# Boucle principale vide pour maintenir le programme en cours d'exécution
while True:
    utime.sleep(1)