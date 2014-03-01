#!/usr/bin/python

import os
import sys

img_dir = '/images/static_image/modified_img/';

def get_files(dir):
    files = os.listdir(dir);
    return [file for file in files if file.endswith('a01.jpg')];

def update_db(files):
    for file in files:
        fields = file.split('-');
        siteid = fields[0]
        local_id = fields[1]
        head_img = img_dir + file
        print "update zhubo set head_img = '%s' where site_id = %s and local_id = %s" % (head_img, siteid, local_id) 


if __name__ == '__main__':
    #print 'start update'
    files = get_files('/home/wangming/meilizhubo/images/static_image/modified_img');
    update_db(files);

    #print 'finished update'

