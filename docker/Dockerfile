#
# OpenTHC Bunk Docker Image
#

FROM openthc/web:latest

#
# Environment
ENV OPENTHC_SERVER_NAME="bunk.docker.openthc.me"


#
# Install
COPY ./ /opt/openthc/bunk
RUN cd /opt/openthc/bunk \
	&& ./make.sh


#
# Configure
COPY ./docker/apache2.conf  /etc/apache2/sites-enabled/000-default.conf
COPY ./docker/init.sh       /init.sh


#
# Volumes
VOLUME [ "/opt/openthc/gfs" ]


#
# Ports
EXPOSE 80


ENTRYPOINT [ "/init.sh" ]
