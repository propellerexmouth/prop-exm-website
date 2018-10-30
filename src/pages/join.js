import React from 'react';
import { Link } from 'gatsby';

import Layout from '../components/layout';
import Header from '../components/header';

const JoinPage = () => (
  <Layout>
    <div className="columns" style={{ minHeight: '100vh' }}>
      <div className="column">
        <div style={{ padding: '3rem' }}>
          <Header />
          <h1>Hi from the second page</h1>
          <p>Welcome to page 2</p>
          <Link to="/">Go back to the homepage</Link>
        </div>
      </div>
    </div>
  </Layout>
)

export default JoinPage
