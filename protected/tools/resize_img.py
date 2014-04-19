#!/usr/bin/python

import sys
import os
import Image

""" input: an image file 
    output: a new image with w:h = 4:3
"""

def resize_img(file):
    img = Image.open(file);
    w,h = img.size;
    w += 0.0
    h += 0.0
    if (abs(h / w - 0.75) < 0.01):
        return;

    if (h / w < 0.75):
        new_w = h * 4 / 3.0
        x1 = int((w - new_w)/2)
        y1 = 0
        x2 = int((w + new_w)/2)
        y2 = h
    else :
        new_h = w * 3 / 4.0
        x1 = 0
        y1 = int((h - new_h)/2)
        x2 = w
        y2 = int((h + new_h)/2)

    arr = file.split('.')
    arr[-2] += "_bak"
    backup_file = '.'.join(arr)
    img.save(backup_file)

    new_img = img.crop((x1,y1,x2,y2));
    new_img.save(file);

if __name__ == '__main__':
    file = sys.argv[1];
    resize_img(file);

