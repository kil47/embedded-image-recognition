import webcolors
import sys
import os
import traceback
log = open("colorlog.txt", "w")
def closest_colour(requested_colour):
    min_colours = {}
    for key, name in webcolors.css3_hex_to_names.items():
        r_c, g_c, b_c = webcolors.hex_to_rgb(key)
        rd = (r_c - requested_colour[0]) ** 2
        gd = (g_c - requested_colour[1]) ** 2
        bd = (b_c - requested_colour[2]) ** 2
        min_colours[(rd + gd + bd)] = name
    return min_colours[min(min_colours.keys())]

def get_colour_name(requested_colour):
    try:
        closest_name = actual_name = webcolors.rgb_to_name(requested_colour)
    except ValueError:
        closest_name = closest_colour(requested_colour)
        actual_name = None
    return actual_name, closest_name

try:
    f=open("col.txt", 'r')
    f1=open("color.txt",'w')

    s=f.read()
    if(s=='Unable to find color'):
        f1.write(s)
        f1.close()
    else:
        requested_colour = eval(s)
        actual_name, closest_name = get_colour_name(requested_colour)

        if(actual_name=="None"):
            f1.write(actual_name)
        else:
            f1.write(closest_name)

        f.close()
        f1.close()
    
except Exception:
    traceback.print_exc(file=log)
