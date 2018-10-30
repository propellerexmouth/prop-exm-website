import React from 'react';
import { Link } from 'gatsby';

import Layout from '../components/layout';
import Header from '../components/header';


const WhoPage = () => (
  <Layout>
    <Header />
    <h1>Who's here</h1>
    <Link to="/">Go back to the homepage</Link>
  </Layout>
)

export default WhoPage
