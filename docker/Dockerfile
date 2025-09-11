#
# OpenTHC Bunk Docker Image
#

FROM openthc/web:latest

#
# Install
#RUN git clone https://github.com/openthc/bunk.git /opt/openthc/bunk \
COPY ./ /opt/openthc/bunk
RUN cd /opt/openthc/bunk \
	&& ./make.sh

#
# Copy
COPY ./docker/rootfs/apache2.conf  /etc/apache2/sites-enabled/bunk.conf
COPY ./docker/rootfs/openthc-init.sh  /openthc-bunk


#
# Volumes
VOLUME [ "/opt/openthc/gfs" ]


#
# Environment
ENV OPENTHC_SERVER_NAME="bunk.docker.openthc.me"


ENTRYPOINT [ "/openthc-bunk" ]
