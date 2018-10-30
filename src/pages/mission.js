import React from 'react';
import { Link } from 'gatsby';

import Layout from '../components/layout';
import Header from '../components/header';

const MissionPage = () => (
  <Layout>
    <Header />
    <h1>Mission</h1>
    <Link to="/">Go back to the homepage</Link>
  </Layout>
)

export default MissionPage
