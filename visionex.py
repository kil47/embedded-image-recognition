import io
from google.cloud import vision
from google.cloud.vision import types
import sys
import traceback
import os
log = open("log.txt", "w")
try:
    os.environ["GOOGLE_APPLICATION_CREDENTIALS"]="apikey.json"
    sys.stdout = open('file.txt', 'w')
    vision_client = vision.Client()
    try:
        file_name = "images/pig.jpg"
        with io.open(file_name, 'rb') as image_file:
            content = image_file.read()
            image = vision_client.image(content=content)
    except IOError:
        try:
            file_name="images/pig.png"
            with io.open(file_name, 'rb') as image_file:
                content = image_file.read()
                image = vision_client.image(content=content)
        except IOError:
            print "PleaseUploadImageAgain"
            exit

    lst=[]
    for i in image.detect_text():
        s=str(i.description)
        st=''
        for i in s:
            if(i=='\n'):
                lst.append(st)
                st=''
            else:
                st+=i
        lst.append(s)

    for st in lst:
        l=len(st)
        if(l>5 and st[0].isalpha() and st[1].isalpha() and st[l-1].isdigit() and st[l-2].isdigit()):	
            s=''
            st=list(st)
            for i in st:
                o=ord(i)
                if  (o>64 and o<91) or (o>96 and o<123) or (o>47 and o<58):
                    s+=i
            f=open('reg.txt','w')
            f.write(s)
            f.close()
            break


    labels = image.detect_labels()
    for label in labels:
        print(label.description)

    client = vision.ImageAnnotatorClient()

    with io.open(file_name, 'rb') as image_file:
        content = image_file.read()

    image = types.Image(content=content)

    response = client.image_properties(image=image)
    props = response.image_properties_annotation

    r=[]
    b=[]
    g=[]
    for color in props.dominant_colors.colors:
        r.append(color.color.red)
        b.append(color.color.green)
        g.append(color.color.blue)

    color=str(sum(r)/len(r))+','+str(sum(g)/len(g))+','+str(sum(b)/len(b))
    f=open('col.txt','w')
    f.write(color)
    f.close()
    

except Exception:
    traceback.print_exc(file=log)
