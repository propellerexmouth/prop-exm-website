import React from 'react';
import { graphql } from 'gatsby';
import Img from 'gatsby-image'

import Layout from '../components/layout';
import Image from '../components/image';

import Header from '../components/header';

const IndexPage = (props) => (
  <Layout>
    <div className="columns" style={{ minHeight: '100vh' }}>
      <div className="column" style={{ background: '#222222', color: '#fff' }}>
        <div style={{ padding: '3rem' }}>
          <Header />
          <h1 className="title" style={{ color: '#fff', fontSize: '4rem' }}>
            building things together
          </h1>
          <h2 className="subtitle" style={{ color: '#fff', fontSize: '1.2rem', marginTop: '20px' }}>
          in beautiful Exmouth, Devon
          </h2>
          <div className="content">
            <p>2 minutes to the beach, train station and town centre. Come and be part of our friendly community of startups, companies, creatives and doers, on a mission to create an exciting mixed use space for working, collaborating, learning and knowledge sharing.</p>
            <p>We love living in this beautiful town but realise things need to change to become vibrant again. So be part of that change.</p>
          </div>
          <button className="button" style={{ background: '#E7322F', border: 'none', color: '#fff'}}>I'd like to join</button>
        </div>
      </div>
      <div className="column" style={{ backgroundColor: '#222', padding: 0 }}>
        <div>
          <Img fluid={props.data.imageOne.childImageSharp.fluid} />
        </div>
      </div>
    </div>
    <div className="columns" style={{ minHeight: '100vh' }}>
      <div className="column" style={{ backgroundColor: '#eee' }}>
        
      </div>
      <div className="column">
        <div style={{ padding: '3rem' }}>
          <h2 className="subtitle">
            What's on for November 2018
          </h2>
          <div className="content">
            <p>2 minutes to the beach, train station and town centre. Come and be part of our friendly community of startups, companies, creatives and doers, on a mission to create an exciting mixed use space for working, collaborating, learning and knowledge sharing.</p>
            <p>We love living in this beautiful town but realise things need to change to become vibrant again. So be part of that change.</p>
          </div>
          <button className="button is-primary">I'd like to join</button>
        </div>
      </div>
    </div>
  </Layout>
);

export const fluidImage = graphql`
fragment fluidImage on File {
  childImageSharp {
    fluid(maxWidth: 1000) {
      ...GatsbyImageSharpFluid
    }
  }
}
`;

export const pageQuery = graphql`
  query {
    imageOne: file(relativePath: { eq: "home-hello.png" }) {
      ...fluidImage
    }
  }
`

export default IndexPage
