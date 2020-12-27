import React, { useRef, useState, useEffect } from "react";
import { Row, Col, Form } from "react-bootstrap";
import 'bootstrap/dist/css/bootstrap.min.css';
import Image from 'react-bootstrap/Image';
import Card from 'react-bootstrap/Card';

import BaseService from "../services/base.services";

export default function Movie({ ...props }) {
  const basrUrlImage = "https://image.tmdb.org/t/p/original/";
  const [movie, setMovie] = useState(null);

  useEffect(() => {
    let id = props.location.pathname.split("/")[3]; // Configurar React Route
    BaseService.get(`movie/${id}`).then(response => {
      console.log(JSON.parse(response.data));
      setMovie(JSON.parse(response.data));
    });
  }, []);

  return (
    <div className="content">
      {movie && (
        <Row>
          <Col lg={6} sm={12}>
            <Image src={basrUrlImage + movie.poster_path} fluid />
          </Col>
          <Col lg={6} sm={12}>
            <Card style={{ width: '100%' }}>
              <Card.Body>
                <Card.Title style={{ fontWeight: "bold" }}>Title</Card.Title>
                <Card.Text>
                  {movie.original_title}
                </Card.Text>
                <Card.Title style={{ fontWeight: "bold" }}>OverView</Card.Title>
                <Card.Text>
                  {movie.overview}
                </Card.Text>
                <Card.Title style={{ fontWeight: "bold" }}>Genres</Card.Title>
                <Card.Text>
                  {movie.genres.map(genre => {
                    return genre.name + ', ';
                  })}
                </Card.Text>
                <Card.Title style={{ fontWeight: "bold" }}>Duration</Card.Title>
                <Card.Text>
                  {movie.runtime}
                </Card.Text>

                <Card.Title style={{ fontWeight: "bold" }}>Companies</Card.Title>
                {movie.production_companies.map(companies => {
                  return (
                    <>
                      {companies.logo_path && (
                        <Card style={{ width: '100%' }}>
                          <Card.Img variant="top" src={basrUrlImage + companies.logo_path} />
                          <Card.Body>
                            <Card.Title>{companies.name}</Card.Title>
                          </Card.Body>
                        </Card>
                      )}
                    </>
                  );
                })}

              </Card.Body>
            </Card>
          </Col>
        </Row>
      )}
    </div>
  );
}

